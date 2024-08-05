<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Filament\Resources\BlogPostResource\RelationManagers;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class BlogPostResource extends Resource
{
  protected static ?string $model = BlogPost::class;

  protected static ?string $navigationIcon = 'tabler-clipboard-list';

  public static function getNavigationLabel(): string
  {
    return __('Post');
  }

  public static function getNavigationGroup(): ?string
  {
    return __('Blog');
  }


  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make('Blog Details')
          ->schema([
            Forms\Components\TextInput::make('title')
              ->label(__('Title'))
              ->required()
              ->placeholder('Enter the title of the blog post'),
            Forms\Components\TextInput::make('slug')
              ->label('Slug')
              ->placeholder(__('Enter Unique Slug!'))
              ->helperText('Leave empty to auto-generate slug')
              ->dehydrateStateUsing(function ($state, \Filament\Forms\get $get) {
                if (empty($state)) {
                  $title = $get('title');

                  return Str::slug($title);
                }

                return Str::slug($state);
              }),
            Forms\Components\Select::make('blog_post_category_id')
              ->label('Category')
              ->relationship('blogPostCategory', 'name')
              ->searchable()
              ->multiple()
              ->preload()
              ->required(),
            Forms\Components\Select::make('author_id')
              ->label(__('Author'))
              ->default(auth()->user()->id)
              ->required()
              ->preload()
              ->searchable()
              ->relationship('author', 'name'),
            TiptapEditor::make('body')
              ->label('Body')
              ->columnSpan('full'),
          ])->columns(2)->columnSpan(2),

        Group::make()->schema([
          Section::make('Published Details')
            ->schema([
              Forms\Components\Toggle::make('is_published')
                ->label('Is Published'),
              Forms\Components\Hidden::make('published_at')
                ->dehydrateStateUsing(function ($state, \Filament\Forms\get $get) {
                  $is_published = $get('is_published');
                  if ($is_published) {
                    return now();
                  }

                  return null;
                }),
            ])->columnSpan(1),

          Section::make('Featured Image')
            ->schema([
              Forms\Components\FileUpload::make('featured_image')
                ->label('Featured Image'),
              Forms\Components\TextInput::make('featured_image_alt_text')
                ->placeholder('Enter alt text for the featured image')
                ->label('Featured image alt text'),
            ])->columnSpan(1),
        ]),

        Section::make('SEO')
          ->schema([
            Forms\Components\TextInput::make('seo_title')
              ->label('Meta Title')
              ->placeholder('Enter SEO title'),
            Forms\Components\Textarea::make('seo_description')
              ->label('Meta Description')
              ->placeholder('Enter SEO description'),
          ])->columnSpan(2),
      ])->columns(3);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('title')
          ->searchable()
          ->label('Title'),
        TextColumn::make('author.name')
          ->searchable()
          ->label('Author'),
        ImageColumn::make('featured_image'),
        ToggleColumn::make('is_published')
          ->searchable()
          ->beforeStateUpdated(function ($record, $state) {
            // Runs before the state is saved to the database.
            if ($state) {
              $record->published_at = now();
            } else {
              $record->published_at = null;
            }
          })
          ->label('Published'),
      ])
      ->filters([
        //
      ])
      ->actions([
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make(),
      ])
      ->bulkActions([
        Tables\Actions\BulkActionGroup::make([
          Tables\Actions\DeleteBulkAction::make(),
        ]),
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
      'index' => Pages\ListBlogPosts::route('/'),
      'create' => Pages\CreateBlogPost::route('/create'),
      'edit' => Pages\EditBlogPost::route('/{record}/edit'),
    ];
  }
}
