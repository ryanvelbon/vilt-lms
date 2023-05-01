<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LessonResource\Pages;
use App\Filament\Resources\LessonResource\RelationManagers;
use App\Models\Lesson;
use App\Models\Topic;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class LessonResource extends Resource
{
    protected static ?string $model = Lesson::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('topic_id')
                    ->label('Topic')
                    ->searchable()
                    ->getSearchResultsUsing(fn (string $search) => Topic::where('title', 'like', "%{$search}%")->limit(50)->pluck('title', 'id'))
                    ->getOptionLabelUsing(fn ($value): ?string => Topic::find($value)?->title)
                    ->required(),
                Forms\Components\Select::make('tutor_id')
                    ->relationship('tutor', 'name')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535),
                Forms\Components\RichEditor::make('content'),
                Forms\Components\TextInput::make('video_url')
                    ->url()
                    ->suffixAction(fn (?string $state): Action =>
                        Action::make('visit')
                            ->icon('heroicon-s-external-link')
                            ->url(
                                filled($state) ? "https://{$state}" : null,
                                shouldOpenInNewTab: true,
                            ),
                    )
                    ->maxLength(255),
                Forms\Components\Toggle::make('level'),
                Forms\Components\Radio::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'review' => 'Review',
                        'scheduled' => 'Scheduled',
                        'published' => 'Published',
                        'archived' => 'Archived'
                    ]),
                Forms\Components\DateTimePicker::make('published_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->size('sm'),
                Tables\Columns\TextColumn::make('topic.subject.title'),
                Tables\Columns\TextColumn::make('tutor.name'),
                Tables\Columns\TextColumn::make('slug')
                    ->size('sm')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('video_url')
                    ->boolean()
                    ->label('Video'),
                Tables\Columns\TextColumn::make('level'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning'    => 'draft',
                        'primary'    => 'review',
                        'secondary'  => 'scheduled',
                        'success'    => 'published',
                        'danger'     => 'archived',
                    ])
                    ->searchable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->size('sm')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->size('sm')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->size('sm')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->size('sm')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLessons::route('/'),
            'create' => Pages\CreateLesson::route('/create'),
            'view' => Pages\ViewLesson::route('/{record}'),
            'edit' => Pages\EditLesson::route('/{record}/edit'),
        ];
    }    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
